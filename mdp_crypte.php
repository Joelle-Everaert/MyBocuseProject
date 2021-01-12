<?php

$mdp='Mouette';

echo password_hash($mdp, PASSWORD_DEFAULT);
echo "<br/>";

$hash = password_hash($mdp, PASSWORD_DEFAULT);
echo $hash;
echo "<br/>";

if (password_verify($mdp, $hash)) {
    echo 'Le mot de passe est valide !';
} else {
    echo 'Le mot de passe est invalide.';
}
?>