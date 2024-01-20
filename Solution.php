class Solution {
    const MAX_INT = 2147483647;
    
    /**
     * @param Integer[][] $matrix
     * @return Integer
     */
    function minFallingPathSum($matrix) {
        $n = count($matrix);
        $dp = array_fill(0, $n, array_fill(0,$n,0));

        for($i = 0; $i < $n; $i++) {
            $dp[0][$i] = $matrix[0][$i];
        }

        for($i = 1; $i < $n; $i++) {
            for($j = 0; $j < $n; $j++) {
                $dp[$i][$j] = $matrix[$i][$j] + min([$dp[$i-1][$j]??self::MAX_INT, $dp[$i-1][$j+1]??self::MAX_INT, $dp[$i-1][$j-1]??self::MAX_INT]);
            }
        }
        
        return min($dp[$n-1]);
    }
}
