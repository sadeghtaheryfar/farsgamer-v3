<?php
if (!function_exists('iteration')) {
    function iteration($loop, $perPage)
    {
        return request()->has('page') && request()->get('page') > 1 ? ((request()->get('page') - 1) * $perPage) + $loop->iteration : $loop->iteration;
    }
}

if (!function_exists('jalaliDate')) {
    function jalaliDate($date, $format = '%d %B %Y H:i:s')
    {
        if ($format == 'diffForHumans'){
            return verta($date)->formatDifference();
        }
        return verta($date)->format($format);
    }
}

//        activity()->withoutLogs(function () {
//            $list = [];
//            for ($i = 0; $i < 1000; $i++) {
//                $list[] = [
//                    'title' => Str::random(),
//                    'image' => 'media/1.jpg',
//                    'description' => Str::random(100),
//                    'slug' => uniqid(),
//                    'created_at' => now()->toDateTimeString(),
//                    'updated_at' => now()->toDateTimeString(),
//                ];
//            }
//
//            $chunks = array_chunk($list, 5000);
//            foreach ($chunks as $chunk) {
//                Article::insert($chunk);
//            }
//        });

//private function availableIn()
//{
//    $time = RateLimiter::availableIn('article-comment:' . auth()->user()->id);
//    $time = gmdate("H:i:s", $time);
//    $time = explode(':', $time);
//    $h = $time[0];
//    $m = $time[1];
//    $s = $time[2];
//    $time = '';
//    if ($h > 0)
//        $time .= "$h ساعت ";
//    if ($m > 0)
//        $time .= "$m دقیقه ";
//    if ($s > 0)
//        $time .= "$s ثانیه";
//    return $time;
//}