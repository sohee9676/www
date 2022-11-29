<?

function generateRandomPassword($length=8, $strength=0) {

    $vowels = 'Zabcd';

    $consonants = 'abcdefghijklnmopqrstuvwxyz';

    if ($strength & 1) {
        $consonants .= 'ABCDEFGHIJKLNMOPQRSTUVWSYZ';
    }

    if ($strength & 2) {
        $vowels .= "AEUY";
    }

    if ($strength & 4) {
        $consonants .= '123456789';
    }

    if ($strength & 8) {
        $consonants .= '@#$%';
    }


    $password = '';
    $alt = time() % 2;

    for ($i = 0; $i < $length; $i++) {

        if ($alt == 1) {
            $password .= $consonants[(rand() % strlen($consonants))];
            $alt = 0;

        } else {
            $password .= $vowels[(rand() % strlen($vowels))];
            $alt = 1;
        }

    }
    return $password;
}

$ranpass = generateRandomPassword(8,8);
echo "$ranpass";

?>