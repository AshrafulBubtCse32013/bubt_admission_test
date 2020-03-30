<?php
include 'include/db.php';
include 'include/session.php';
if(isset($_GET['program_id'])){
    $sql_sub = "SELECT as_subject.* FROM as_subject left join qus_limit on qus_limit.sub_id=as_subject.sub_id where program_id='".$_GET['program_id']."' and limit_qus!=0";
    $result_sub  = mysqli_query($conn, $sql_sub);
    $select_result   = $result_sub->fetch_all(MYSQLI_ASSOC);
}else{
    echo "Please select program";
    die();
}




                                                        if($select_result){
                                                            echo '<table class="table table-bordered">';
                                                            foreach ($select_result as $key => $value) {
                                                                echo '<tr>
                                                                <th>'.$value["subject_name"].'</th>
                                                                <td><input type="number" class="input-sm" name="subject['.$value['sub_id'].']" value="0"></td>
                                                                </tr>';
                                                            }
                                                            echo '</table>';
                                                        }
                                                        ?>    