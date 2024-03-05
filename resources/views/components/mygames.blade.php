<div>
    <div class="grid grid-cols-4 gap-20 mt-10 w-full h-full">
        @foreach ($games as $game)
            <x-mygamecard :game="$game"/>
        @endforeach
    </div>
</div>
