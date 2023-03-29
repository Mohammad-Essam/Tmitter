function renderFollowButton(context)
{
    if(context.dataset.follow)
    {
        context.classList.remove('btn-unfollow');
        context.classList.add('btn-follow');
        context.innerHTML='Follow';
        context.dataset.follow = ''
    }
    else
    {
        context.classList.remove('btn-follow');
        context.classList.add('btn-unfollow');
        context.innerHTML='unfollow';
        context.dataset.follow = '1'
    }
}

