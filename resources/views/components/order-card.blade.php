<div class="flex justify-center items-center bg-gray-100">
    <div class="bg-white shadow-md rounded-lg p-4 max-w-md w-full mb-2">
        <h2 class="font-bold text-xl mb-2">Заявка от {{ $order->created_at ? $order->created_at->format('d.m.Y') : 'Неизвестное время' }}</h2>
        <p><strong>дата</strong> 
            {{$order->date}}
        </p>
        <p><strong>время</strong> 
            {{$order->time}}
        </p>
        <p><strong>тип</strong> 
            {{$order->type}}
        </p>
        <p><strong>оплата</strong> 
            {{$order->payment}}
        </p>
        <p><strong>адрес</strong> 
            {{$order->adress}}
        </p>
        <p>
            <strong>Статус:</strong> 
            <span class="{{ $order->statuses_id == 1 ? 'text-black' : ($order->statuses_id == 2 ? 'text-blue-600' : 'text-red-600') }}">
                {{ $order->status ? $order->status->title : 'Новая' }}
            </span>
        </p>
    </div>
</div>
