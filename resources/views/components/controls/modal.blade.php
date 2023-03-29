@props(
    [
        'title' => null,
        'content' => null,
        'id' => null,
    ]
)
<style>
    .modal{
        position: fixed;
        z-index: 10;
        display: none;
        align-items: center;
        justify-content: center;
        background-color: rgba(0,0,0, 0.4);
        width: 100vw;
        height: 100%;
    }
    .modal::backdrop
    {
        filter: blur(3px);
    }
    .content {
        width:60%;
        padding: 32px;
        height: fit-content;
        background-color: white;
        border-radius: 10px;
    }
</style>

<div class="modal" onclick="this.style.display = 'none';" id="{{ $id }}">
    <div class="content" onclick="event.stopPropagation()">
        {{ $slot }}
    </div>
</div>
