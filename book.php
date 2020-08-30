    <?php
    header('Content-Type: application/json');

    $aResult = array();

    if( !isset($_POST['functionname']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functionname']) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://raw.githubusercontent.com/malagonius/Ssacramentale-merate/master/data.txt');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            curl_close($ch);

            case 'book': 

                  $aResult['result'] =  $myfile = file_put_contents('data.txt', $_POST['arguments'].PHP_EOL, FILE_APPEND | LOCK_EX);
               break;

            case 'load':

                  $aResult['result'] =  $data;
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