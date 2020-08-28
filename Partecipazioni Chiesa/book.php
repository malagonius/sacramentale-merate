    <?php
    header('Content-Type: application/json');

    $aResult = array();

    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functionname']) {
            case 'book':
                 //$v = json_decode(stripslashes(file_get_contents("php://input")));
                 $inputJSON = file_get_contents('php://input');
                 $input= json_decode( $inputJSON ); 
                 $aResult['result'] =  $myfile = file_put_contents('data.txt', $inputJSON , FILE_APPEND | LOCK_EX);
               }
               break;

            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }

    echo json_encode($aResult);

?>