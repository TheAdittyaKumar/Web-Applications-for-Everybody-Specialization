<!DOCTYPE html>
<head><title>ADITTYA KUMAR CHOWDHURY MD5 Cracker</title></head>
<body>
<h1>MD5 PIN Cracker</h1>
<p>This application takes an MD5 hash of a four-digit PIN and attempts to hash all 10,000 possible PINs to determine the original value.</p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];
    $digits = "0123456789"; // character will be limited to digits 0 to 9
    $show = 15; //Number of debug attempts to print is the first 15
    
    //Nested loop that will generate the four digit pin combination 0000-9999
    for($i=0;$i<10;$i++){ // First digit (0-9)
        for($j=0;$j<10;$j++){ // Second digit (0-9)
            for($k=0;$k<10;$k++){ // Third digit (0-9)
                for($l=0;$l<10;$l++){ // Fourth digit (0-9)
                    // Construct a 4-digit string using loop counters
                    $try = $digits[$i] . $digits[$j] . $digits[$k] . $digits[$l];
                    $check=hash('md5',$try);  // Convert PIN to MD5 hash
                     
                    //Example:  If $try = "1234", then $check = "81dc9bdb52d04dc20036dbd8313ed055"
                    //Debug output for the first 15 attempts
                    if ($show>0){
                        print "$check $try\n";
                        $show--;
                    }
                    if ($check==$md5){
                        $goodtext=$try;
                        break 4;
                    
                    }
                    
                }
            }
        }
    }

    // Compute elapsed time
    $time_post = microtime(true);
    print "Elapsed time: " . ($time_post - $time_pre) . " seconds\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>Original PIN: <?= htmlentities($goodtext); ?></p>
<!-- Form to input MD5 hash -->
<form>
    <input type="text" name="md5" size="40" placeholder="Enter MD5 hash" />
    <input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>
<li><a
href="https://github.com/csev/wa4e/tree/master/code/crack"
target="_blank">Source code for this application</a></li>
</ul>
</body>
</html>

