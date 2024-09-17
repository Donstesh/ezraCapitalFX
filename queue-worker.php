<?php

exec('php /home/yourusername/public_html/your-laravel-project/artisan queue:work --daemon', $output, $return_var);

echo "Command executed with return status: $return_var\n";
echo "Output: " . implode("\n", $output);
