       







         <li class="list-group-item">

            <a href="{{  route('client.profile')  }}" class="{!! Route::current()->getName() == 'client.profile' ? 'activedash':'' !!} ">

                <i class="fa fa-bars" aria-hidden="true"></i>

                Account Dashboard

            </a>

        </li>

        <li class="list-group-item">

            <a href="{{  route('client.profile_info')  }}" class="{!! Route::current()->getName() == 'client.profile_info' ? 'activedash':'' !!} ">

                <i class="fa fa-info-circle" aria-hidden="true"></i>

                Account Information

            </a>

        </li>

        <li class="list-group-item">

            <a href="{{  route('client.get_addresses')  }}"  class="{!! Route::current()->getName() == 'client.get_addresses' ? 'activedash':'' !!}  {!! Route::current()->getName() == 'client.edit_address' ? 'activedash':'' !!}">

                <i class="fa fa-book" aria-hidden="true"></i>

                Address Book

            </a>

        </li>

        <li class="list-group-item">

            <a href="{{  route('client.orders')  }}" class="{!! Route::current()->getName() == 'client.orders' ? 'activedash':'' !!}">

                <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                My Order

            </a>

        </li>

        <li class="list-group-item">

            <a href="{{  route('client.wishlistItems')  }}" class="{!! Route::current()->getName() == 'client.wishlistItems' ? 'activedash':'' !!}">

                <i class="fa fa-heart-o" aria-hidden="true"></i>

                My Wishlist

            </a>

        </li>