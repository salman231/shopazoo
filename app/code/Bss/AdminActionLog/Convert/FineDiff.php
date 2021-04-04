<?php
/**
 * BSS Commerce Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://bsscommerce.com/Bss-Commerce-License.txt
 *
 * @category   BSS
 * @package    Bss_AdminActionLog
 * @author     Extension Team
 * @copyright  Copyright (c) 2017-2018 BSS Commerce Co. ( http://bsscommerce.com )
 * @license    http://bsscommerce.com/Bss-Commerce-License.txt
 */
namespace Bss\AdminActionLog\Convert;

class FineDiff {

    private $granularityStack = [" \t.\n\r"];

    private $edits = [];

    private $from_text;

    private $to_text;

    private $stackpointer;

    private $diffCopyFactory;

    private $diffDeleteFactory;

    private $diffInsertFactory;

    private $diffReplaceFactory;

    /**
     * FineDiff constructor.
     * @param FineDiffCopyOpFactory $diffCopyFactory
     * @param FineDiffDeleteOpFactory $diffDeleteFactory
     * @param FineDiffInsertOpFactory $diffInsertFactory
     * @param FineDiffReplaceOpFactory $diffReplaceFactory
     */
    public function __construct(
        \Bss\AdminActionLog\Convert\FineDiffCopyOpFactory $diffCopyFactory,
        \Bss\AdminActionLog\Convert\FineDiffDeleteOpFactory $diffDeleteFactory,
        \Bss\AdminActionLog\Convert\FineDiffInsertOpFactory $diffInsertFactory,
        \Bss\AdminActionLog\Convert\FineDiffReplaceOpFactory $diffReplaceFactory
    ){
        $this->diffCopyFactory = $diffCopyFactory;
        $this->diffDeleteFactory = $diffDeleteFactory;
        $this->diffInsertFactory = $diffInsertFactory;
        $this->diffReplaceFactory = $diffReplaceFactory;
    }

    /**
     * @return array
     */
    public function getOps()
    {
        return $this->edits;
    }

    /**
     * @return string
     */
    public function getOpcodes()
    {
        $opcodes = [];
        foreach ( $this->edits as $edit ) {
            $opcodes[] = $edit->getOpcode();
            }
        return implode('', $opcodes);
    }


    /**
     * @param $from
     * @param $to
     * @return string
     */
    public function getDiffOpcodes($from, $to)
    {
        $this->from_text = $from;
        $this->doDiff($from, $to);
        return $this->getOpcodes();
    }

    /**
     * @param $to
     * @param $opcodes
     * @return mixed
     */
    public function _renderDiffToHTML($to, $opcodes)
    {
        $opcodes_len = strlen($opcodes);
        $from_offset = $opcodes_offset = 0;
        $html = $to;
        while ( $opcodes_offset <  $opcodes_len ) {
            $opcode = substr($opcodes, $opcodes_offset, 1);
            $opcodes_offset++;
            $n = intval(substr($opcodes, $opcodes_offset));
            if ($n) {
                $opcodes_offset += strlen(strval($n));
            } else {
                $n = 1;
            }

            if ($opcode === 'i'){
                $html_i = $this->renderDiffToHTMLFromOpcode('i', $opcodes, $opcodes_offset + 1, $n);
                $html_r = substr($opcodes, $opcodes_offset + 1, $n);
                $html = str_replace($html_r, $html_i, $html);
                $opcodes_offset += 1 + $n;
            }
        }
        return $html;
    }

    /**
     * @param $from
     * @param $opcodes
     * @return string
     */
    public function renderDiffToHTML($from, $opcodes)
    {
        $opcodes_len = strlen($opcodes);
        $from_offset = $opcodes_offset = 0;
        $html = '';
        while ($opcodes_offset <  $opcodes_len) {
            $opcode = substr($opcodes, $opcodes_offset, 1);
            $opcodes_offset++;
            $n = intval(substr($opcodes, $opcodes_offset));
            if ($n) {
                $opcodes_offset += strlen(strval($n));
            } else {
                $n = 1;
            }
            if ($opcode === 'c') {
                $html .= $this->renderDiffToHTMLFromOpcode('c', $from, $from_offset, $n, '');
                $from_offset += $n;
            } else if ($opcode === 'd') {
                $html .= $this->renderDiffToHTMLFromOpcode('d', $from, $from_offset, $n, '');
                $from_offset += $n;
            } else if ($opcode !== 'd' && strlen($from) > 1) {
                $html = $from;
                break;
            }
        }
        return $html;
    }

    /**
     * @param $from_text
     * @param $to_text
     */
    public function doDiff($from_text, $to_text)
    {
        $this->last_edit = false;
        $this->stackpointer = 0;
        $this->from_text = $from_text;
        $this->from_offset = 0;
        if ( empty($this->granularityStack) ) {
            return;
        }
        $this->_processGranularity($from_text, $to_text);
    }

    /**
     * @param $from_segment
     * @param $to_segment
     */
    public function _processGranularity($from_segment, $to_segment)
    {
        $delimiters = $this->granularityStack[$this->stackpointer++];
        $has_next_stage = $this->stackpointer < count($this->granularityStack);
        foreach ( $this->doFragmentDiff($from_segment, $to_segment, $delimiters) as $fragment_edit ) {
                $this->edits[] = $this->last_edit = $fragment_edit;
                $this->from_offset += $fragment_edit->getFromLen();
            }
        $this->stackpointer--;
    }

    /**
     * @param $from_text
     * @param $to_text
     * @param $delimiters
     * @return array
     */
    public function doFragmentDiff($from_text, $to_text, $delimiters)
    {
        if ( empty($delimiters) ) {
            return $this->doCharDiff($from_text, $to_text);
        }

        $result = [];

        $from_text_len = strlen($from_text);
        $to_text_len = strlen($to_text);
        $from_fragments = $this->extractFragments($from_text, $delimiters);
        $to_fragments = $this->extractFragments($to_text, $delimiters);

        $jobs = [[0, $from_text_len, 0, $to_text_len]];

        while ( $job = array_pop($jobs) ) {

            // get the segments which must be diff'ed
            list($from_segment_start, $from_segment_end, $to_segment_start, $to_segment_end) = $job;

            // catch easy cases first
            $from_segment_length = $from_segment_end - $from_segment_start;
            $to_segment_length = $to_segment_end - $to_segment_start;
            if ( !$from_segment_length || !$to_segment_length ) {
                if ( $from_segment_length ) {
                    $result[$from_segment_start * 4] = $this->diffDeleteFactory->create(['len' => $from_segment_length]);
                    }
                else if ( $to_segment_length ) {
                    $result[$from_segment_start * 4 + 1] = $this->diffInsertFactory->create(['text' => substr($to_text, $to_segment_start, $to_segment_length)]);
                    }
                continue;
                }

            $best_copy_length = 0;

            $from_base_fragment_index = $from_segment_start;

            $simpleLoop = $this->simpleLoop($from_segment_start, $from_segment_end, $from_fragments, $to_fragments, $to_segment_start, $to_segment_end, $to_text_len, $from_segment_length);

            $best_copy_length = $simpleLoop['best_copy_length'];
            $best_from_start = $simpleLoop['best_from_start'];
            $best_to_start = $simpleLoop['best_to_start'];
            $from_segment_start = $simpleLoop['from_segment_start'];
            $to_segment_start = $simpleLoop['to_segment_start'];
            $to_segment_end = $simpleLoop['to_segment_end'];

            if ( $best_copy_length ) {
                $jobs[] = [$from_segment_start, $best_from_start, $to_segment_start, $best_to_start];
                $result[$best_from_start * 4 + 2] = $this->diffCopyFactory->create(['len' => $best_copy_length]);
                $jobs[] = [$best_from_start + $best_copy_length, $from_segment_end, $best_to_start + $best_copy_length, $to_segment_end];
                }
            else {
                $result[$from_segment_start * 4] = $this->diffReplaceFactory->create(['fromLen' => $from_segment_length,'text' => substr($to_text, $to_segment_start, $to_segment_length)]);
                }
            }

        ksort($result, SORT_NUMERIC);
        return array_values($result);
    }

    /**
     * @param $from_segment_start
     * @param $from_segment_end
     * @param $from_fragments
     * @param $to_fragments
     * @param $to_segment_start
     * @param $to_segment_end
     * @param $to_text_len
     * @param $from_segment_length
     * @return array
     */
    private function simpleLoop($from_segment_start, $from_segment_end, $from_fragments, $to_fragments, $to_segment_start, $to_segment_end, $to_text_len, $from_segment_length)
    {
        $best_from_start = $best_to_start = null;
        $best_copy_length = 0;

        $from_base_fragment_index = $from_segment_start;

        while ( $from_base_fragment_index < $from_segment_end ) {
                $from_base_fragment = $from_fragments[$from_base_fragment_index];
                $from_base_fragment_length = strlen($from_base_fragment);
                $to_all_fragment_indices = array_keys($to_fragments, $from_base_fragment, true);

                // get only indices which falls within current segment
                if ( $to_segment_start > 0 || $to_segment_end < $to_text_len ) {
                    $to_fragment_indices = $this->_simpleLoop($to_all_fragment_indices, $to_segment_start, $to_segment_end);
                } else {
                    $to_fragment_indices = $to_all_fragment_indices;
                }
                // iterate through collected indices
                foreach ( $to_fragment_indices as $to_base_fragment_index ) {
                    $fragment_index_offset = $from_base_fragment_length;
                    // iterate until no more match
                    for (;;) {
                        $fragment_from_index = $from_base_fragment_index + $fragment_index_offset;
                        if ( $fragment_from_index >= $from_segment_end ) {
                            break;
                            }
                        $fragment_to_index = $to_base_fragment_index + $fragment_index_offset;
                        if (( $fragment_to_index >= $to_segment_end )
                           || ( $from_fragments[$fragment_from_index] !== $to_fragments[$fragment_to_index] )
                        ){
                            break;
                            }
                        $fragment_length = strlen($from_fragments[$fragment_from_index]);
                        $fragment_index_offset += $fragment_length;
                        }
                    if ( $fragment_index_offset > $best_copy_length ) {
                        $best_copy_length = $fragment_index_offset;
                        $best_from_start = $from_base_fragment_index;
                        $best_to_start = $to_base_fragment_index;
                        }
                    }
                $from_base_fragment_index += strlen($from_base_fragment);

                if (( $best_copy_length >= $from_segment_length / 2)
                     || ($from_base_fragment_index + $best_copy_length >= $from_segment_end)
                    ) {
                    break;
                }
            }
        return ['best_copy_length' => $best_copy_length,
                'best_from_start' => $best_from_start,
                'best_to_start' => $best_to_start,
                'from_segment_start' => $from_segment_start,
                'to_segment_start' => $to_segment_start,
                'to_segment_end' => $to_segment_end
            ];
    }

    /**
     * @param $to_all_fragment_indices
     * @param $to_segment_start
     * @param $to_segment_end
     * @return array
     */
    private function _simpleLoop($to_all_fragment_indices, $to_segment_start, $to_segment_end)
    {
        $to_fragment_indices = [];
        foreach ( $to_all_fragment_indices as $to_fragment_index ) {
            if ( $to_fragment_index < $to_segment_start ) { continue; }
            if ( $to_fragment_index >= $to_segment_end ) { break; }
            $to_fragment_indices[] = $to_fragment_index;
        }
        return $to_fragment_indices;
    }

    /**
     * @param $from_text
     * @param $to_text
     * @return array
     */
    private function doCharDiff($from_text, $to_text)
    {
        $result = [];
        $jobs = [[0, strlen($from_text), 0, strlen($to_text)]];
        while ( $job = array_pop($jobs) ) {
            // get the segments which must be diff'ed
            list($from_segment_start, $from_segment_end, $to_segment_start, $to_segment_end) = $job;
            $from_segment_len = $from_segment_end - $from_segment_start;
            $to_segment_len = $to_segment_end - $to_segment_start;

            // catch easy cases first
            if ( !$from_segment_len || !$to_segment_len ) {
                $result = $result + $this->getResultFirst($from_segment_len, $from_segment_start, $to_text, $to_segment_start, $to_segment_len);
                continue;
            }
            if ( $from_segment_len >= $to_segment_len ) {
                $copy_len = $to_segment_len;
                while ( $copy_len ) {
                    $to_copy_start = $to_segment_start;
                    $to_copy_start_max = $to_segment_end - $copy_len;
                    while ( $to_copy_start <= $to_copy_start_max ) {
                        $from_copy_start = strpos(substr($from_text, $from_segment_start, $from_segment_len), substr($to_text, $to_copy_start, $copy_len));
                        if ( $from_copy_start !== false ) {
                            $from_copy_start += $from_segment_start;
                            break 2;
                            }
                        $to_copy_start++;
                        }
                    $copy_len--;
                    }
                }
            else {
                $copy_len = $from_segment_len;
                while ( $copy_len ) {
                    $from_copy_start = $from_segment_start;
                    $from_copy_start_max = $from_segment_end - $copy_len;
                    while ( $from_copy_start <= $from_copy_start_max ) {
                        $to_copy_start = strpos(substr($to_text, $to_segment_start, $to_segment_len), substr($from_text, $from_copy_start, $copy_len));
                        if ( $to_copy_start !== false ) {
                            $to_copy_start += $to_segment_start;
                            break 2;
                            }
                        $from_copy_start++;
                        }
                    $copy_len--;
                    }
                }

                $result = $result + $this->getResultLast($copy_len, $from_copy_start, $from_segment_start, $from_segment_len, $to_text, $to_segment_start, $to_segment_len);
            }
            
        ksort($result, SORT_NUMERIC);
        return array_values($result);
    }

    /**
     * @param $from_segment_len
     * @param $from_segment_start
     * @param $to_text
     * @param $to_segment_start
     * @param $to_segment_len
     * @return array
     */
    private function getResultFirst($from_segment_len, $from_segment_start, $to_text, $to_segment_start, $to_segment_len)
    {
        $result = [];
        if ( $from_segment_len ) {
            $result[$from_segment_start * 4 + 0] = $this->diffDeleteFactory->create(['len' => $from_segment_len]);
        } else if ( $to_segment_len ) {
            $result[$from_segment_start * 4 + 1] = $this->diffInsertFactory->create(['text' => substr($to_text, $to_segment_start, $to_segment_len)]);
        }
        return $result;
    }

    /**
     * @param $copy_len
     * @param $from_copy_start
     * @param $from_segment_start
     * @param $from_segment_len
     * @param $to_text
     * @param $to_segment_start
     * @param $to_segment_len
     * @return array
     */
    private function getResultLast($copy_len, $from_copy_start, $from_segment_start, $from_segment_len, $to_text, $to_segment_start, $to_segment_len)
    {
        $result = [];
        if ( $copy_len ) {
            $result[$from_copy_start * 4 + 2] = $this->diffCopyFactory->create(['len' => $copy_len]);
        } else {
            $result[$from_segment_start * 4] = $this->diffReplaceFactory->create(['fromLen' => $from_segment_len,'text' => substr($to_text, $to_segment_start, $to_segment_len)]);
        }
        return $result;
    }

    /**
     * @param $text
     * @param $delimiters
     * @return array
     */
    private function extractFragments($text, $delimiters)
    {
        if ( empty($delimiters) ) {
            $chars = str_split($text, 1);
            $chars[strlen($text)] = '';
            return $chars;
            }
        $fragments = [];
        $start = $end = 0;
        for (;;) {
            $end += strcspn($text, $delimiters, $end);
            $end += strspn($text, $delimiters, $end);
            if ( $end === $start ) {
                break;
                }
            $fragments[$start] = substr($text, $start, $end - $start);
            $start = $end;
            }
        $fragments[$start] = '';
        return $fragments;
    }

    /**
     * @param $opcode
     * @param $from
     * @param $from_offset
     * @param $from_len
     * @return string
     */
    private function renderDiffToHTMLFromOpcode($opcode, $from, $from_offset, $from_len)
    {
        $html = '';
        if ( $opcode === 'c' ) {
            $html .= htmlentities(substr($from, $from_offset, $from_len));
            }
        else if ( $opcode === 'd' ) {
            $deletion = substr($from, $from_offset, $from_len);

            if ( strcspn($deletion, " \n\r") === 0 ) {
                $deletion = str_replace(["\n","\r"], ['\n','\r'], $deletion);
                }
            $html .= '<del>'.htmlentities($deletion).'</del>';
        } else {
            $html .= '<ins>'.htmlentities(substr($from, $from_offset, $from_len)).'</ins>';
        }

        return $html;
    }
}