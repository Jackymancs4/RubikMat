<?php

$n=3;

$cube;
$color=array("r","g","b","o","y","w");

for ($i=0; $i < $n+2; $i++) { 
	for ($j=0; $j < $n+2; $j++) { 
		for ($k=0; $k < $n+2; $k++) { 

			$cube[$i][$j][$k]=0;

		}		
	}	
}

for ($i=1; $i < $n+1; $i++) { 

	for ($j=1; $j < $n+1; $j++) { 
		$cube[0][$i][$j]=$color[0];
	}

}

for ($i=1; $i < $n+1; $i++) { 

	for ($j=1; $j < $n+1; $j++) { 
		$cube[$i][0][$j]=$color[1];
	}

}

for ($i=1; $i < $n+1; $i++) { 

	for ($j=1; $j < $n+1; $j++) { 
		$cube[$i][$n+1][$j]=$color[2];
	}

}

for ($i=1; $i < $n+1; $i++) { 

	for ($j=1; $j < $n+1; $j++) { 
		$cube[$n+1][$i][$j]=$color[3];
	}

}

for ($i=1; $i < $n+1; $i++) { 

	for ($j=1; $j < $n+1; $j++) { 
		$cube[$i][$j][0]=$color[4];
	}

}

for ($i=1; $i < $n+1; $i++) { 

	for ($j=1; $j < $n+1; $j++) { 
		$cube[$i][$j][$n+1]=$color[5];
	}

}

for ($i=0; $i < $n+2; $i++) { 
	for ($j=0; $j < $n+2; $j++) { 
		for ($k=0; $k < $n+2; $k++) { 

				echo($cube[$i][$j][$k]." ");

		}		
		echo ("<br>");
	}	
	echo ("<br>");

}

	echo ("<br>");
	echo ("<br>");

	$f = floor(($n+2)/2);
	$c = ceil(($n+2)/2);

	for ($i=0; $i < $f; $i++) { 
		for ($j=0; $j < $c; $j++) { 
		    $temp = $cube[$i][$j][$n+1];
		    $cube[$i][$j][$n+1] = $cube[$j][$n+2-1-$i][$n+1];
		    $cube[$j][$n+2-1-$i][$n+1] = $cube[$n+2-1-$i][$n+2-1-$j][$n+1];
		    $cube[$n+2-1-$i][$n+2-1-$j][$n+1] = $cube[$n+2-1-$j][$i][$n+1];
		    $cube[$n+2-1-$j][$i][$n+1] = $temp;
		}
	}

	for ($i=0; $i < $f; $i++) { 
		for ($j=0; $j < $c; $j++) { 
		    $temp = $cube[$i][$j][$n];
		    $cube[$i][$j][$n] = $cube[$j][$n+2-1-$i][$n];
		    $cube[$j][$n+2-1-$i][$n] = $cube[$n+2-1-$i][$n+2-1-$j][$n];
		    $cube[$n+2-1-$i][$n+2-1-$j][$n] = $cube[$n+2-1-$j][$i][$n];
		    $cube[$n+2-1-$j][$i][$n] = $temp;
		}
	}

for ($i=1; $i < $n+1; $i++) { 

	for ($j=1; $j < $n+1; $j++) { 
		echo $cube[0][$i][$j];
	}
	echo ("<br>");

}
echo ("<br>");
for ($i=1; $i < $n+1; $i++) { 

	for ($j=1; $j < $n+1; $j++) { 
		echo $cube[$i][0][$j];
	}
	echo ("<br>");

}
echo ("<br>");
for ($i=1; $i < $n+1; $i++) { 

	for ($j=1; $j < $n+1; $j++) { 
		echo $cube[$i][$n+1][$j];
	}
	echo ("<br>");

}
echo ("<br>");
for ($i=1; $i < $n+1; $i++) { 

	for ($j=1; $j < $n+1; $j++) { 
		echo $cube[$n+1][$i][$j];
	}
	echo ("<br>");

}
echo ("<br>");
for ($i=1; $i < $n+1; $i++) { 

	for ($j=1; $j < $n+1; $j++) { 
		echo $cube[$i][$j][0];
	}
	echo ("<br>");

}
echo ("<br>");
for ($i=1; $i < $n+1; $i++) { 

	for ($j=1; $j < $n+1; $j++) { 
		echo $cube[$i][$j][$n+1];
	}
	echo ("<br>");

}
echo ("<br>");


?>