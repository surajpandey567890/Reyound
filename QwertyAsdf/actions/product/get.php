<?php

    require('../../../common/library.php');
    require('../../../common/constant.php');
    $today = CURRENTTIME;
    
    //$_POST['ID']="Mg==";
    
    if(isset($_POST['ID']) && $_POST['ID']!="")
    {
        $ID=base64_decode($_POST['ID']);
        
        $get_data = $obj->select("*", "product", "ID='$ID'");
        if(is_array($get_data))
        {
            $cate_id=$get_data[0][1];
            $html="";
            $get_type=$obj->select("ID,name","category","1 ORDER BY ID ASC");
	        if(is_array($get_type))
	        {
	            foreach($get_type as $val)
	            {
	                if($val[0]==$cate_id)
	                {
	                    $html.="<option value='".$val[0]."' selected>".ucfirst($val[1])."</option>";
	                }
	                else
	                {
	                    $html.="<option value='".$val[0]."'>".ucfirst($val[1])."</option>";
	                }
	            }
	        }
	        
	        $sub_cate_id=$get_data[0][2];
	        $get_sub_type=$obj->select("ID,subcat_name","sub_category","1 ORDER BY ID ASC");
	        $sub_html="<option value=''> Select Subcategory</option>";
	        if(is_array($get_sub_type))
	        {
	            foreach($get_sub_type as $val)
	            {
	                if($val[0]==$sub_cate_id)
	                {
	                    $sub_html.="<option value='".$val[0]."' selected>".ucfirst($val[1])."</option>";
	                }
	                else
	                {
	                    $sub_html.="<option value='".$val[0]."'>".ucfirst($val[1])."</option>";
	                }
	            }
	        }
	        
	        $main_id=$get_data[0][3];
	        $get_main_categoty=$obj->select("ID,subcat_name","sub_main_category","1 ORDER BY ID ASC");
	        $submain_html="<option value=''>Select Sub Main Category</option>";
	        if(is_array($get_main_categoty))
	        {
	            foreach($get_main_categoty as $val)
	            {
	                if($val[0]==$main_id)
	                {
	                    $submain_html.="<option value='".$val[0]."' selected>".ucfirst($val[1])."</option>";
	                }
	                else
	                {
	                    $submain_html.="<option value='".$val[0]."'>".ucfirst($val[1])."</option>";
	                }
	            }
	        }
	        $gst_id_edit=$get_data[0][18];
	        $gst=$obj->select("ID,name","gst","1 ORDER BY ID ASC");
	        $gst_html="<option value=''>Select Gst</option>";
	        if(is_array($gst))
	        {
	            foreach($gst as $val)
	            {
	                if($val[0]==$gst_id_edit)
	                {
	                    $gst_html.="<option value='".$val[0]."' selected>".ucfirst($val[1])."</option>";
	                }
	                else
	                {
	                    $gst_html.="<option value='".$val[0]."'>".ucfirst($val[1])."</option>";
	                }
	            }
	        }
	        $colour_id_edit=$get_data[0][19];
	        $colour=$obj->select("ID,name","colour","1 ORDER BY ID ASC");
	        $colour_html="<option value=''>Select Colour</option>";
	        if(is_array($colour))
	        {
	            foreach($colour as $val)
	            {
	                if($val[0]==$colour_id_edit)
	                {
	                    $colour_html.="<option value='".$val[0]."' selected>".ucfirst($val[1])."</option>";
	                }
	                else
	                {
	                    $colour_html.="<option value='".$val[0]."'>".ucfirst($val[1])."</option>";
	                }
	            }
	        }
	        $size_id_edit=$get_data[0][20];
	        $size=$obj->select("ID,name","size","1 ORDER BY ID ASC");
	        $size_html="<option value=''>Select Size</option>";
	        if(is_array($size))
	        {
	            foreach($size as $val)
	            {
	                if($val[0]==$size_id_edit)
	                {
	                    $size_html.="<option value='".$val[0]."' selected>".ucfirst($val[1])."</option>";
	                }
	                else
	                {
	                    $size_html.="<option value='".$val[0]."'>".ucfirst($val[1])."</option>";
	                }
	            }
	        }
	        
            $data['response']="y";
            $data['product_id']=$get_data[0][0];
            $data['category_option']=$html;
            $data['subcategory_option']=$sub_html;
            $data['submaincategory_option']=$submain_html;
            $data['name']=$get_data[0][4];
            $data['sku']=$get_data[0][5];
            $data['product_price']=$get_data[0][7];
            $data['offer_price']=$get_data[0][8];
            $data['stock']=$get_data[0][9];
            $data['hsn_code']=$get_data[0][17];
            $data['gst_option']=$gst_html;
            $data['colour_option']=$colour_html;
            $data['size_option']=$size_html;
            $data['short_description']=htmlspecialchars_decode($get_data[0][12],ENT_QUOTES);
            $data['long_description']=htmlspecialchars_decode($get_data[0][6],ENT_QUOTES);
            $data['message']="Data found";
            echo json_encode($data);
        }
        else
        {
            $data['response']="n";
            $data['message']="Data not found";
            echo json_encode($data);
        }
    }
    else
    {
        $data['response']="n";
        $data['message']="All fields required";
        echo json_encode($data);
    }
?>