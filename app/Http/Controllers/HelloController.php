<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

global $head, $style, $body, $end;
$head = '<html><head>';
$style = <<<EOM
<style>
body {
  font-size:16pt; color:#999;
}
h1 {
  font-size: 100pt;
  text-align:right;
  color:#eee;
  margin:-40px 0px -50px 0px;
}
</style>
EOM;
$body = '</head><body>';
$end = '</body></html>';

function tag($tag, $txt) {
  return "<$tag>" . $txt . "</$tag>";
}

class HelloController extends Controller
{
    //
    public function index() {
      global $head, $style, $body, $end;
      $html = $head . tag('title', 'Hello/Index') . $style . $body .
        tag('h1', 'Index') . tag('p', 'This is index page') .
        '<a href="/hello/other">go to Other Page</a>' . $end;
      return $html;
    }

    public function other() {
      global $head, $style, $body, $end;
      $html = $head . tag('title', 'Hello/Other') . $style . $body .
        tag('h1', 'Other') . tag('p', 'This is other page') .
        '<a href="/hello">go to index Page</a>' . $end;
      return $html;
    }
}
