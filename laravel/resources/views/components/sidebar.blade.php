<div id="sidebar">
    <div>
        <div>
            <div>
                <a class="shopping {{ $types['shopping'] }}" href="{{ route('myaccount.purchases') }}">
                    <p>Compras</p>
                </a>

                <a class="sales {{ $types['sales'] }}" href="{{ route('myaccount.sales.index') }}">
                    <p>Vendas</p>
                </a>

                <a class="configurations {{ $types['configurations'] }}" href="{{ route('myaccount.config') }}">
                    <p>Configurações</p>
                </a>
            </div>
        </div>
    </div>
</div>
