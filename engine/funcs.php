<?php 

 function translite($text) {
  $alfavit=[
  "а" => 'a','б' => 'b','в'=> 'v',
  'г' => 'g','д' => 'd','е' => 'e',
  'ё' => 'e','ж' => 'zh','з' => 'z',
  'и' => 'i','й' => 'i','к' => 'k',
  'л' => 'l','м' => 'm','н' => 'n',
  'о' => 'o','п' => 'p','р' => 'r',
  'с'=>'s', 'т' => 't','у' => 'u',
  'ф' => 'f','х' =>'kh','ц' => 'ts',
  'ч' => 'ch','ш' => 'sh','щ'=> 'shch',
  'ъ'=>'ye ','ы' => 'y','э' => 'e',
  'ю' => 'iu','я' =>'ia'];
    $text = (string) $text;
    $text = function_exists('mb_strtolower') ? mb_strtolower($text) : strtolower($text);
    $text = strtr($text,$alfavit);
    return $text; 
}

function replace($string)
{
    return str_replace([' ', '\''], ['_', ''], $string);
}
function url_translite($text){
  
 return replace(translite($lower));
  }
//$path="./public_html/";

function one($path){
    $dir=scandir($path);
        foreach($dir as $key=>$val){
            if($val==='.' || $val==='..'){
                continue;
            }
            else{
                if(is_dir($path.$val)){
                     $dir=one($path.$val.DIRECTORY_SEPARATOR);
                }
                 else{
                     $info=pathinfo($path.$val);
                    if($info['extension']=='jpg'){
                     echo "<a href='".$path.$val."' target='__blank'><img src='".$path.$val."' class='catalog' width='30%'></a>";
                 // echo $val;
                    }  
  
                         
                }
            }   
         }
}

function counts($row,$index,$link){
    $count=$row+1;
    
   $sql="UPDATE `gallery` SET `count`='$count' WHERE `id`='$index'";
 $result=mysqli_query($link,$sql);
}
?>