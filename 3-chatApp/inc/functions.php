<?php

function sanitize($str) {
   return htmlspecialchars(stripslashes(trim($str)));
}