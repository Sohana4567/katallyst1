<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
<div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Course</h2>
                <?php
                if($_SERVER['REQUEST_METHOD']=='POST') {
                    
                    
                    $course_title=mysqli_real_escape_string($db->link,$_POST['course_title']);
                    $course_description=mysqli_real_escape_string($db->link,$_POST['course_description']);
                    
                    $permitted=array('jpg','jpeg','png','gif');
                    $file_name=$_FILES['image']['name'];
                    $file_size=$_FILES['image']['size'];
                    $file_temp=$_FILES['image']['tmp_name'];
                    $div=explode('.',$file_name);
                    $file_ext=strtolower(end($div));
                    $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
                    $uploaded_image="upload/".$unique_image;

                    if($course_title=="" || $course_description=="" || $file_name==""){
                        echo "<span class='error'>Field must not be empty !</span>";
                   }elseif($file_size>1048567){
                       echo "<span class='error'>Image size must be less than 1MB !</span>";
                   }
                   elseif(in_array($file_ext,$permitted)==false){
                    echo "<span class='error'>You can upload only:-".implode(',',$permitted)."</span>";
                }
                else{
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query="INSERT INTO `tbl_course`(`image`,`course_title`,`course_description`) VALUES ('$uploaded_image','$course_title','$course_description')";
                        $inserted_rows=$db->insert($query);
                        if($inserted_rows){
                            echo "<span class='success'>Course  Inserted Successfully</span>";
                        }else{
                            echo "<span class='error'>course not inserted!</span>";
                        }
                    }
                }
  
?>
<div class="block">               
                 <form action="addcourse.php" method="post" enctype="multipart/form-data">
                    <table class="form">
                    <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <label>Course title</label>
                            </td>
                            <td>
                                <input type="text" name="course_title" placeholder="Enter Course Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Course description</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="course_description"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Add" />
                                
                            </td>
                        </tr>

                    </table>
                    </form>
                </div>
            </div>
        </div>
        <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
                       