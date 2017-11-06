<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id','target_type','target_id','parent_id','body'];

    protected $table = 'comments';

    /**
     * 当前这条评论数据所属的用户.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 显示评论信息
     */
    public function show()
    {
        $output = <<<EOF
<div class="media">
    <a class="pull-left" href="#pablo">
        <div class="avatar">
            <img class="media-object" src="/storage/{$this->user->avatar}" alt="User Avatar" width="64" height="64">
        </div>
    </a>
    <div class="media-body">
        <h4 class="media-heading">{$this->user->name}<small>· {$this->created_at}</small></h4>
        <h6 class="text-muted"></h6>

        {$this->body}
        
        <div class="media-footer" style="height: 40px">
            <button class="action-replay btn btn-sm btn-danger pull-right"  data-user="{$this->user->name}" data-parent="{$this->id}" style="font-size: 16px">
                回复
                <div class="ripple-container"></div>
             </button> 
        </div>
        {$this->showChildren()}
    </div>
</div>
<br/>
EOF;
        return $output;
    }

    /**
     * 显示子评论信息
     *
     * @return string
     */
    public function showChildren()
    {
        $output = '';
        if($this->children){
            foreach ($this->children as $child){
                $output = $output.$child->show();
            }
        }
        return $output;
    }
}

