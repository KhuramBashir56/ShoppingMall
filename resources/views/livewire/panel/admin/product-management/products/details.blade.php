<x-slot name="title">
    {{ __($product->title) }}
</x-slot>
<x-slot name="description">
    {{ $product->meta_description }}
</x-slot>
<x-slot name="keywords">
    {{ $product->meta_keywords }}
</x-slot>
<section class="grid gap-4">
    <x-panel.ui.page-header>
        <div class="flex gap-4 flex-wrap">
            <x-ui.links.primary href="{{ route('admin.products.list') }}" title="View Products List" />
            <x-ui.links.primary href="{{ route('admin.products.create') }}" title="Add New Product" />
        </div>
    </x-panel.ui.page-header>
    <x-panel.ui.card>
        <div class="w-full flex gap-4 flex-col sm:flex-row">
            <div class="w-full sm:w-1/2 lg:w-1/3 aspect-square">
                <img src="{{ asset(config('app.img_url') . $product->thumbnail) }}" alt="{{ $product->title . 'thumbnail image' }}" class="w-full h-full">
            </div>
            <div class="w-full sm:w-1/2 lg:w-2/3">
                <x-ui.table.table>
                    <x-ui.table.tbody>
                        <x-ui.table.tr>
                            <x-ui.table.th :content="__('Product Category')" class="text-left" />
                            <x-ui.table.td :content="$product->category->title" />
                        </x-ui.table.tr>
                        <x-ui.table.tr>
                            <x-ui.table.th :content="__('Product Brand')" class="text-left" />
                            <x-ui.table.td :content="$product->brand->name" />
                        </x-ui.table.tr>
                        <x-ui.table.tr>
                            <x-ui.table.th :content="__('Product Unit')" class="text-left" />
                            <x-ui.table.td :content="$product->unit->title . ' (' . $product->unit->code . ')'" />
                        </x-ui.table.tr>
                        <x-ui.table.tr>
                            <x-ui.table.th :content="__('Product Author')" class="text-left" />
                            <x-ui.table.td :content="$product->author->name" />
                        </x-ui.table.tr>
                        <x-ui.table.tr>
                            <x-ui.table.th :content="__('Date')" class="text-left" />
                            <x-ui.table.td :content="$product->created_at->format('d M, Y h:i A')" />
                        </x-ui.table.tr>
                        <x-ui.table.tr>
                            <x-ui.table.th :content="__('Visibility')" class="text-left" />
                            <x-ui.table.td>
                                @if ($product->status == 'published')
                                    <x-ui.badges.success :content="__('Visible')" />
                                @else
                                    <x-ui.badges.danger :content="__('Un Visible')" />
                                @endif
                            </x-ui.table.td>
                        </x-ui.table.tr>
                    </x-ui.table.tbody>
                </x-ui.table.table>
            </div>
        </div>
        <div class="w-full mt-4">
            <h1 class="text-3xl mb-3">{{ $product->name }}</h1>
            <p class="mb-3"><strong>Description: </strong> {{ $product->description }}</p>
            <div class="mb-3">
                <div class="flex gap-2 flex-wrap">
                    <strong>Meta Keyeords: </strong>
                    @foreach (explode(',', $product->meta_keywords) as $data)
                        <x-ui.badges.primary :content="$data" />
                    @endforeach
                </div>
            </div>
            <p class="mb-3"><strong>Meta Description: </strong> {{ $product->meta_description }}</p>
        </div>
    </x-panel.ui.card>
</section>
