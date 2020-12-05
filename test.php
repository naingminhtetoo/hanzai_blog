<?php

$pwd ="adminadmin";

$spwd = password_hash($pwd,PASSWORD_DEFAULT);

echo $spwd;