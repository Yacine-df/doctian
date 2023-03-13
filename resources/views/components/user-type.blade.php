@props(['userType','userTypeImage','userUrl'])
<a href="{{$userUrl}}" class="flex flex-col items-center opacity-50 hover:opacity-100 m-1 bg-blue-200 border border-gray-200 rounded-lg shadow  hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 font-bold tracking-tight text-gray-900 dark:text-white">{{$userType}}</h5>
    </div>
    <img class="object-cover w-full rounded-t-lg h-80 md:w-48 md:rounded-none md:rounded-l-lg" src="https://as2.ftcdn.net/v2/jpg/05/57/73/57/1000_F_557735785_gE0Y9OetnBamXae7JVOJITnXeItrKqLU.webp" alt="">
</a>