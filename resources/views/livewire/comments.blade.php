<div>
    
    <div class="dark:bg-gray-800 dark:text-white shadow rounded-lg p-6 mb-8">

        <ul>

            @foreach ($comments as $comment)
                <li>
                    {{$comment}}
                </li>
            @endforeach

        </ul>


    </div>


</div>
