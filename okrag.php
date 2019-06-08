<html>
<body>
<form action="okrag.php" method="get">
<input type = "number" name="promien"><br>
<input type="submit">
<body>
</html>
<?php
$promien = $_GET["promien"]; //okrag dla promienia 5
$liczba = $promien*3; 
$tablica = array_fill(0, $liczba, array_fill(0, $liczba, 0));
$dlugosc = count($tablica);
$dl = $dlugosc-$promien;
$wzor = ($dl-1)/3-1;
$wzor2 = ($dl-1)/3;
echo "<br>";
echo "<br>";
echo "<br>";
for($i=0;$i<$dlugosc;$i++){ // petla poszczegolnego rzedu
    for($j=0;$j<$dlugosc;$j++){ // -||- kolumny         
if ($i>0 && $i<$promien+1 && $j==0 && $i<$dl){ //rysowanie do polowy dlugosci okregu
    if($i==1 && $j==0){ //warunki rysowania dla poszczegolnych rzedow
        for($seclast=-1;$seclast<$dlugosc+$promien;$seclast++){      
        
            if($seclast>=$wzor && $seclast<$liczba/3 || $seclast>=$liczba-1 && $seclast<$liczba+$wzor)          
        echo '*';       
    
        else {
        echo str_repeat("&nbsp;", 2);          
    }
}
    } 
    for($z=0;$z<$dlugosc+$promien+1;$z++){ //petla rysujaca od 2 rzedu do polowy okregu  
        
        if($i>1){
            
            if($i==2 && $z>=$wzor2-$i+1 && $z<=$wzor2||$i==2 && $z>=$liczba+2 && $z<$dlugosc+$promien-1)          
             echo '*';                      
            
        else if($i>2 && $i<$promien && $z>=$wzor2-$i && $z<$wzor || $i>2 && $i<$promien && $z>$liczba+3 && $z<=$dlugosc+$promien)
        echo '*'; 

        else if($i==$promien && $z==0 || $i==$promien && $z==$dlugosc+$promien)
            echo '*';
        
            else {
            echo str_repeat("&nbsp;", 2); 
            }
        }
    }
}
else if ($i>$promien && $j==0 && $i<$dl){ //warunek rysowania dla drugiej polowy okregu
     for($c=0;$c<$dlugosc+$promien+1;$c++){  
        
        if($i<$promien+$wzor2)
            if($c>=0 && $c<$wzor || $c>$liczba+$wzor2 && $c<=$dlugosc+$promien+1)
                echo '*';
else {
    echo str_repeat("&nbsp;", 2); 
}

if($i==$promien+$wzor2)
    if($c>1 && $c<$wzor2+1 || $c>=$liczba+$wzor && $c<=$liczba+$wzor2 )
        echo '*';

        else {
            echo str_repeat("&nbsp;", 2); 
        }
if($i==$dl-1)
    if($c>$wzor && $c<$liczba/3+1 || $c>=$liczba && $c<=$liczba+$wzor)
        echo '*';

  else{
        echo str_repeat("&nbsp;", 2); 
        }
    }  
}
        if($i==0 && $j==$liczba/3+4|| $i==$dl && $j==$liczba/3+1){ //rysowanie gornej i dolnej granicy
        for($k=0;$k<$dl-1;$k++)
            echo '*';  
}
else {
    echo str_repeat("&nbsp;", 2);
        }  
    }  
echo "<br>";
echo str_repeat("&nbsp;", 3); 
echo str_repeat("&nbsp;", 3); 
}
?>