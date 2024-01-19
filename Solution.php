class Solution {
    
    /**
     * @param Integer[][] $matrix
     * @return Integer
     */
    function minFallingPathSum($matrix) {
        $n = count($matrix);
        $dp = array_fill(0, $n, array_fill(0,$n,0));

        for($i = 0; $i < $n; $i++){
            $dp[0][$i] = $matrix[0][$i];
        }

        for($i = 1; $i < $n; $i++) {
            for($j = 0; $j < $n; $j++) {
                if ($j == 0) {
                    $dp[$i][$j] = $matrix[$i][$j] + min([$dp[$i-1][$j], $dp[$i-1][$j+1]]);
                } else if ($j == $n-1) {
                    $dp[$i][$j] = $matrix[$i][$j] + min([$dp[$i-1][$j], $dp[$i-1][$j-1]]);
                } else {
                    $dp[$i][$j] = $matrix[$i][$j] + min([$dp[$i-1][$j], $dp[$i-1][$j+1], $dp[$i-1][$j-1]]);
                }
            }
        }
        
        return min($dp[$n-1]);
    }
}
