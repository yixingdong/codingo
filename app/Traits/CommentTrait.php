<?php
/**
 * Created by PhpStorm.
 * User: artisan
 * Date: 17-11-6
 * Time: 下午10:03
 */

namespace App\Traits;


trait CommentTrait
{
    /**
     * 当前这条评论的子评论
     */
    public function children()
    {
        return $this->hasMany(self::class,'parent_id')
            ->where('target_type',$this->target_name)
            ->with('user','children');
    }

    /**
     * 当前这条评论数据所属的文章
     */
    public function target()
    {
        return $this->belongsTo('App\\'.ucfirst($this->target_name),'target_id');
    }

    /**
     * 当前这条评论的上层评论数据
     */
    public function parent()
    {
        return $this->belongsTo(self::class,'parent_id')
            ->where('target_type',$this->target_name);
    }
}