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
                  $aResult['result'] = file_get_contents('data.txt');
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