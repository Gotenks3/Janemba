@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight pl-4">
            フォロワー一覧
        </h2>
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if (count($followers) > 0)
                @foreach ($followers as $followerUser )
                <div class="mb-2 md:flex md:items-center border-b-2 border-fuchsia-600">
                    <div class="flex justify-around md:w-3/12 mb-3">
                        <a href="{{ route('user.show', ['id' => $followerUser->id]) }}">
                            <img src="{{ asset('storage/profiles/'  . $followerUser->profile->icon) }}" alt="no-image" class="object-fill" style="border-radius: 50%; width: auto; height: auto;"></img>
                        </a>
                    </div>
                    <div class="flex justify-around md:w-3/12 mb-3">
                        {{ $followerUser->profile->nickname }}
                    </div>
                    <div class="flex justify-around md:w-3/12 mb-2">
                        <div>{{ $followerUser->profile->content }}</div>
                    </div>
                    <div class="flex justify-around md:w-3/12 mb-3">
                        @if( Auth::id() !== $followerUser->id )
                        <follow-component :initial-is-followed-by='@json($followerUser->isFollowedBy(Auth::user()))' :count-followers='@json($followerUser->count_followers)' endpoint="{{ route('user.follow', ['user' => $followerUser]) }}" />
                        @endif
                    </div>
                </div>
                @endforeach

                @else
                まだ誰もフォローしていません。
                @endif
            </div>
        </div>
    </div>
</div>

@endsection