<?php

/**
 * 操作扩充.
 * 
 */
trait ActTrait
{

    protected function welcome()
    {
        return "Welcome to use speed.";
    }

    /**
     * 默认主检索.
     *
     * @farwish
     */
    protected function major()
    {
        return self::answers();
    }

    /**
     * Answers.
     *
     * @farwish
     */
    protected function answers()
    {   
        $docs = $data = []; 

        $seek = parent::fuzzy();

        $docs = $seek->search();
        $total = $seek->dbTotal;
        $count = $seek->lastCount;

        if ($docs) {
            foreach ($docs as &$doc) {
                $data[] = [ 
                    'content' => $doc->content,
                ];
            }
        }

        return $data;
    } 

}