<x-main-layout>

    <x-slot name="head">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .card {
                width: 350px;
                background-color: #fff;
                border: none;
                cursor: pointer;
                transition: all 0.5s;
            }

            .image img {
                transition: all 0.5s
            }

            .card:hover .image img {
                transform: scale(1.5)
            }

            .name {
                font-size: 22px;
                font-weight: bold
            }

            .idd {
                font-size: 14px;
                font-weight: 600
            }

            .idd1 {
                font-size: 12px
            }

            .number {
                font-size: 22px;
                font-weight: bold
            }

            .follow {
                font-size: 12px;
                font-weight: 500;
                color: #444444
            }

            .btn1 {
                height: 40px;
                width: 150px;
                border: none;
                background-color: #000;
                color: #aeaeae;
                font-size: 15px
            }

            .text span {
                font-size: 13px;
                color: #545454;
                font-weight: 500
            }

            .icons i {
                font-size: 19px
            }

            hr .new1 {
                border: 1px solid
            }

            .join {
                font-size: 14px;
                color: #a0a0a0;
                font-weight: bold
            }

            .date {
                background-color: #ccc
            }
        </style>
    </x-slot>

    <div class="container">
        <h3>Profil {{ $user->name }}</h3>

        <x-border></x-border>

        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
            <div class="card p-4">
                <div class=" image d-flex flex-column justify-content-center align-items-center">

                    <p class="badge rounded-pill text-bg-success fs-1">
                        {{ $userRank }}
                    </p>

                    <button class="btn btn-secondary">
                        <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" />
                    </button>
                    <span class="name mt-3">{{ $user->name }}</span> <span
                        class="idd">{{ '@' . $user->username }}</span>
                    <div class="d-flex flex-row justify-content-center gap-4 align-items-center mt-3">
                        <span class="number">{{ $user->followers->count() }}
                            <span class="follow">Followers</span>
                        </span>
                        <span class="number">{{ $user->memes->count() }}
                            <span class="follow">Memes</span>
                        </span>
                    </div>
                    <div class="d-flex flex-row justify-content-center gap-4 align-items-center mt-3">
                        <span class="number">{{ $highestUpvotes }}
                            <span class="follow">Top Upvote</span>
                        </span>
                        <span class="number">{{ $totalUpvotes }}
                            <span class="follow">Total Upvote</span>
                        </span>
                    </div>
                    <div class=" d-flex mt-2">
                        <livewire:follow-user-button :user="$user" />
                    </div>
                    <div class="text mt-3">
                        <span>
                            {{ $user->bio }}
                        </span>
                    </div>
                    <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
                        <span>
                            <i class="fa fa-twitter">
                            </i>
                        </span>
                        <span>
                            <i class="fa fa-facebook-f"></i>
                        </span>
                        <span>
                            <i class="fa fa-instagram"></i>
                        </span>
                        <span>
                            <i class="fa fa-linkedin">
                            </i>
                        </span>
                    </div>
                    <div class=" px-2 rounded mt-4 date "> <span class="join">
                            Joined {{ $user->created_at->format('F, Y') }}
                        </span> </div>
                </div>
            </div>


        </div>

        <livewire:user-memes :user_id="$user->id" />
    </div>

</x-main-layout>
