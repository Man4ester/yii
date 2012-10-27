<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class PostBaseModel extends BaseModel {

    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISHED = 'published';
    const STATUS_ARCHIVED = 'archived';

    public static function getStatus() {
        return array(
            self::STATUS_DRAFT => "Draft",
            self::STATUS_PUBLISHED => "Published",
            self::STATUS_ARCHIVED => "Archived",
        );
    }



}

?>
