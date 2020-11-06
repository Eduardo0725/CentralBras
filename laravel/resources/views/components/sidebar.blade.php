<div id="sidebar">
    <div>
        <div>
            <div>
                <a class="shopping {{ isset($shopping) ? 'active' : '' }}" href="{{ route('myaccount.purchases') }}">
                    <p>Compras</p>
                </a>

                <a class="sales {{ isset($sales) ? 'active' : '' }}" href="{{ route('myaccount.sales') }}">
                    <p>Vendas</p>
                </a>

                <a class="configurations {{ isset($configurations) ? 'active' : '' }}" href="{{ route('myaccount.config') }}">
                    <p>Configurações</p>
                </a>
            </div>
        </div>
    </div>
</div>
