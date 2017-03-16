<?php 
/*
Trefast Development
Trefast Development merupakan Start up Bussiness di bidang 
jasa pengembangan produk teknologi informasi yang terdiri dari web development
@author: Mucharom
@Email :mucharomtzaka@yahoo.co.id / mucharomtzaka@gmail.com
@Alamat: Jl.Pagersari-Patean , Kendal 51354 Jawa Tengah
@HP/Whatapps:+6289692412261
@https://github.com/mucharomtzaka
@fanspage : https://www.facebook.com/trefast.teknik.indonesia 
homepage coming soon 
*/

$string = "<div class=\"content-wrapper\">
   <section class=\"content\">
    <div class=\"box\">
 <div class=\"box-header with-border\">
          <div class=\"box-tools pull-right\">
            <button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\" data-toggle=\"tooltip\" title=\"Collapse\">
              <i class=\"fa fa-minus\"></i></button>
            <button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"remove\" data-toggle=\"tooltip\" title=\"Remove\">
              <i class=\"fa fa-times\"></i></button>
          </div>
        </div>
         <div class=\"box-body\">
        <h2 style=\"margin-top:0px\">".ucfirst($table_name)." <?php echo \$button ?></h2>
     <?php echo form_open(\$action,'class=\"form-horizontal\"');?>";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text' && $row["data_type"] == 'tinytext')
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["column_name"]."\" class=\"col-md-4 control-label\">".label($row["column_name"])."</label>
            <div class=\"col-md-6\">
            <textarea class=\"form-control textarea\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
            </div>
            <?php echo form_error('".$row["column_name"]."') ?>
        </div>";
    } 
    elseif($row["data_type"] == 'date')
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["column_name"]."\" class=\"col-md-4 control-label\">".label($row["column_name"])." </label>
            <div class=\"col-md-4\">
             <input type=\"date\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"tanggal\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
             <?php echo form_error('".$row["column_name"]."') ?>
            </div>
        </div>";
    } 
    else
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["data_type"]."\" class=\"col-md-4 control-label\">".label($row["column_name"])." </label>
             <div class=\"col-md-4\">
            <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
            </div>
            <?php echo form_error('".$row["column_name"]."') ?>
        </div>";
    }
}
$string .= "\n\t    <input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-primary\"><?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\"><i class=\"fa fa-cancel\"></i>Cancel</a>";
$string .= "\n\t<?php echo form_close();?>
 </div>
   </div>
        </section>
</div>";

createFile($string, $path_view.'/'. $v_form_file);

?>