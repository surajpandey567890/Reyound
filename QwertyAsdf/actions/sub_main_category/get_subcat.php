<?php

require('../../../common/library.php');

//$_POST['ID']='MQ==';
if (isset($_POST['ID']) && $_POST['ID'] != "") {
    $ID = $_POST['ID'];

    $cat_data = $obj->select("ID,subcat_name", "sub_category", "cat_id='$ID' AND status=1");

    $cate_html = "";
    if (is_array($cat_data)) {
        $cate_html .= "<option value=''>Select Subcategory</option>";
        foreach ($cat_data as $value) {
            $cate_html .= "<option value='" . $value[0] . "' selected>" . $value[1] . "</option>";
        }
        $data['response'] = "y";
        $data['subcate_options'] = $cate_html;
        $data['message'] = "Data found";
        echo json_encode($data);
    } else {
        $data['response'] = "n";
        $data['message'] = "No Data Found";
        echo json_encode($data);
        //$cate_html.="<option>No data found</option>";
    }
} else {
    $data['response'] = "n";
    $data['message'] = "All the field required";
    echo json_encode($data);
}
