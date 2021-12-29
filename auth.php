<?php
    include 'firebasecon.php';
    use Firebase\Auth\Token\Exception\InvalidToken;
    $auth = $factory->createAuth();
    //create custom token
    $token = $auth->createCustomToken('subhankar0810@gmail.com');
    // print_r($token);
    $str = $token->toString();
    print_r($str);
    $signInResult = $auth->signInAnonymously();
    $signInResult = $auth->signInWithEmailAndPassword("subhankar0810@gmail.com","123456");
    // $uid = $vtoken->claims()->get('sub');
    print_r($signInResult);
    // $user = $auth->getUser($uid);
?>