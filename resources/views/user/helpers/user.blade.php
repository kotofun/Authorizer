<li>
    <span>{{$user->id}}</span>
    <span>{{$user->name or 'Имя не указано'}}</span>
    @foreach($user->info as $info)
        <br>
        <strong>Помощь: {{$info->helps['help_type']}}</strong>
        @if($helps = $info->helps['help_value'])
            {{ var_dump($helps)  }}
        @endif
        @if($info->contact_value)
            <br>
            <span>Доп. контакт: {{ $info->contact_type }} {{$info->contact_value}}</span>
        @endif
        @if($info->comment)
            <br>
            <span>Комментарий: {{$info->comment}}</span>
        @endif
    @endforeach
    <ul>
        @each('user.helpers.social_account', $user->socialAccounts, 'account')
    </ul>
</li>
