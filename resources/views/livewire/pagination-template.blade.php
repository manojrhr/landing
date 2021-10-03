<div>
    @if ($paginator->hasPages())
    
        <div class="d-flex flex-wrap justify-content-center tour-filters-pagination">
            @if ($paginator->onFirstPage())
                <span class="tour-pagination-item prev-next next">
                    <a class="tour-pagination-link tour-pagination-current">{!! __('pagination.previous') !!}</a>
                </span>
            @else
                <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="tour-pagination-item">
                    {!! __('pagination.previous') !!}
                </button>
            @endif

            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="tour-pagination-item prev-next next">
                    <a class="tour-pagination-link prev-next next">{!! __('pagination.next') !!}</a>
                </button>
            @else
                <span class="tour-pagination-item prev-next next">
                    <a class="tour-pagination-link prev-next next">{!! __('pagination.next') !!}</a>
                </span>
            @endif
            {{-- <span class="tour-pagination-item">
                <a class="tour-pagination-link tour-pagination-current">1</a>
            </span>
            <span class="tour-pagination-item">
                <a class="tour-pagination-link">2</a>
            </span>
            <span class="tour-pagination-item prev-next next">
                <a class="tour-pagination-link prev-next next">Next</a>
            </span> --}}
        </div>

        {{-- <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            <span>
                {{-- Previous Page Link --}
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                        {!! __('pagination.previous') !!}
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        {!! __('pagination.previous') !!}
                    </button>
                @endif
            </span>
 
            <span>
                {{-- Next Page Link --}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        {!! __('pagination.next') !!}
                    </button>
                @else
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                        {!! __('pagination.next') !!}
                    </span>
                @endif
            </span>
        </nav> --}}
    @endif
</div>