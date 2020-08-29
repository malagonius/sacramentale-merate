    <?php
    header('Content-Type: application/json');

    $aResult = array();

    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functionname']) {

            case 'book': 

                  $aResult['result'] =  $myfile = file_put_contents('data.txt', $_POST['arguments'].PHP_EOL, FILE_APPEND | LOCK_EX);
               break;

            case 'load':
                  $aResult['result'] = file_get_contents('            https://felix-cloud-shared-1-sacramentale-merate-335746352675.s3-accesspoint.us-west-1.amazonaws.com/sacramentale-merate/data.txt?response-content-disposition=attachment%3B%20filename%3D%22data.txt%22%3B%20filename%2A%3DUTF-8%27%27data.txt&response-content-type=text%2Fplain&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAU4LAKYYRWQKUA2OB%2F20200829%2Fus-west-1%2Fs3%2Faws4_request&X-Amz-Date=20200829T101314Z&X-Amz-Expires=7200&X-Amz-SignedHeaders=host&X-Amz-Signature=e4c66778f5c3d4239e2dface0da663434a916d6203874adf0168686cfac54b4c');
                break;
                
            case 'delete-all':
                  $aResult['result'] =  $myfile = file_put_contents('data.txt', "", LOCK_EX);
                 break;

            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }

    echo json_encode($aResult);

?>