<?php
// Created by Josef Jelinek <josef.jelinek@gmail.com> [http://rubikscube.info]
// Public Domain - use for whatever and however you please at your own risk
// Personal message:
// Try to make the world a better place, be tolerant, do not be ignorant, and do not foist irrational beliefs upon others.

$side = isset($_GET['n']) ? 1 * $_GET['n'] : 3;
$size = isset($_GET['size']) ? $_GET['size'] : 100;
$dim = min(5 * $size, 500);
$fl = isset($_GET['fl']) ? $_GET['fl'] : $_GET['stickers'];
$b = isset($_GET['b']) ? $_GET['b'] : 25;
$d = isset($_GET['d']) ? $_GET['d'] : 5;
$mxy = isset($_GET['m']) ? $_GET['m'] : '';
$mx = $mxy == 'x' || $mxy == 'xy' ? -1 : 1;
$my = $mxy == 'y' || $mxy == 'xy' ? -1 : 1;

function rotu($u, $v, $a)
{
    return $u * cos($a) - $v * sin($a);
}

function rotv($u, $v, $a)
{
    return $u * sin($a) + $v * cos($a);
}

function rotxy($x, $y, $z, $ex, $ey, $ez, $ax, $ay)
{
    $ry = rotu($ey, $ez, $ax);
    $rz = rotv($ey, $ez, $ax);
    $rx = rotu($ex, $rz, $ay);
    $rz = rotv($ex, $rz, $ay);

    return $x * $rx + $y * $ry + $z * $rz;
}

function rotz($x, $y, $z, $ax, $ay)
{
    return rotxy($x, $y, $z, 0, 0, -1, $ax, $ay);
}

function perspective($x, $y, $z, $ax, $ay, $p)
{
    return $p / (1.0 - 0.3 * rotz($x, $y, $z, $ax, $ay));
}

function projxy($face, $x, $y, $z, $ex, $ey, $ax, $ay)
{
    $xx = $face == 2 ? $z : $x;
    $yy = $face == 0 ? -$z : $y;
    $zz = $face == 0 ? -$y : ($face == 2 ? $x : -$z);

    return perspective($xx, $yy, $zz, $ax, $ay, rotxy($xx, $yy, $zz, $ex, $ey, 0, $ax, $ay));
}

function projx($face, $x, $y, $z, $ax, $ay)
{
    return projxy($face, $x, $y, $z, 1, 0, $ax, $ay);
}

function projy($face, $x, $y, $z, $ax, $ay)
{
    return projxy($face, $x, $y, $z, 0, 1, $ax, $ay);
}

function outcoordx($x, $m)
{
    return $m > 0 ? $x * 0.58 + 0.52 : $x * -0.58 + 0.48;
}

function outcoordy($y, $m)
{
    return $m > 0 ? $y * 0.58 + 0.46 : $y * -0.58 + 0.54;
}

function tile($face, $color, $x0, $y0, $x1, $y1, $x2, $y2, $x3, $y3, $z, $ax, $ay)
{
    global $im, $dim, $mx, $my;
    $xx0 = outcoordx(projx($face, $x0, $y0, $z, $ax, $ay), $mx) * $dim;
    $yy0 = outcoordy(projy($face, $x0, $y0, $z, $ax, $ay), $my) * $dim;
    $xx1 = outcoordx(projx($face, $x1, $y1, $z, $ax, $ay), $mx) * $dim;
    $yy1 = outcoordy(projy($face, $x1, $y1, $z, $ax, $ay), $my) * $dim;
    $xx2 = outcoordx(projx($face, $x2, $y2, $z, $ax, $ay), $mx) * $dim;
    $yy2 = outcoordy(projy($face, $x2, $y2, $z, $ax, $ay), $my) * $dim;
    $xx3 = outcoordx(projx($face, $x3, $y3, $z, $ax, $ay), $mx) * $dim;
    $yy3 = outcoordy(projy($face, $x3, $y3, $z, $ax, $ay), $my) * $dim;
    imagefilledpolygon($im, array($xx0, $yy0, $xx1, $yy1, $xx2, $yy2, $xx3, $yy3), 4, $color);
}

function square($face, $color, $x, $y, $z, $size, $border)
{
    tile($face, $color,
         $x + $border - 0.5, $y + $border - 0.5,
         $x + $size - $border - 0.5, $y + $border - 0.5,
         $x + $size - $border - 0.5, $y + $size - $border - 0.5,
         $x + $border - 0.5, $y + $size - $border - 0.5,
         $z, -0.5, 0.6);
}

$c = array('r' => 0xD00000,
           'o' => 0xEE8800,
           'b' => 0x2040D0,
           'g' => 0x11AA00,
           'w' => 0xFFFFFF,
           'y' => 0xFFFF00,
           'l' => 0xDDDDDD,
           'd' => 0x555555,
           'x' => 0x999999,
           'k' => 0x111111,
           'c' => 0x0099FF,
           'p' => 0xFF99CC,
           'm' => 0xFF0099, );

$im = imagecreatetruecolor($dim, $dim);
imagealphablending($im, false);
$bg = imagecolorallocatealpha($im, 255, 255, 255, 127);
imagefilledrectangle($im, 0, 0, $dim - 1, $dim - 1, $bg);
imagealphablending($im, true);

square(0, 0x010101, 0, 0, 0.5, 1, 0); // U
square(1, 0x090909, 0, 0, 0.5, 1, 0); // F
square(2, 0x050505, 0, 0, 0.5, 1, 0); // R

for ($face = 0; $face < 3; ++$face) {
    for ($i = 0; $i < $side; ++$i) {
        for ($j = 0; $j < $side; ++$j) {
            square($face, $c[substr($fl, ($face * $side + $i) * $side + $j, 1)],
                   $j / (1.0 * $side), $i / (1.0 * $side), 0.5 + $d / 1000.0, 1.0 / $side, $b / 1000.0);
        }
    }
}

$im2 = imagecreatetruecolor($size, $size);
imagealphablending($im2, false);
$bg2 = imagecolorallocatealpha($im2, 255, 255, 255, 127);
imagefilledrectangle($im2, 0, 0, $size - 1, $size - 1, $bg2);
imagealphablending($im2, true);
imagecopyresampled($im2, $im, 0, 0, 0, 0, $size, $size, $dim, $dim);
imagedestroy($im);
imagealphablending($im2, false);
imagesavealpha($im2, true);

header('Content-type: image/png');
imagepng($im2);
//imagepng($im2, "img/$fl-$size$mxy.png", 9);
imagedestroy($im2);
