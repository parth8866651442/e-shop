<?php

namespace App\Helpers;
use Illuminate\Support\Arr;
use App\Models\Category;

class Helper
{
    public static function getHeaderCategory(){
        $category = new Category();
        
        $menu=$category->getAllParentWithChild();
        if($menu){
            // parent category
            foreach($menu as $parentCat){
        ?>
            <span>
                <a class="mega-menu-title" href="#"><?php echo $parentCat->title; ?></a>
                <?php
                    // child category
                    foreach($parentCat->getChildCategory as $subCategory){
                ?>
                    <a href="#"><?php echo $subCategory->title; ?></a>
                <?php } ?>
            </span>
        <?php
            }
        }
    }
}