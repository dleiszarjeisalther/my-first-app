<!-- Start: Pulse Dashboard Layout -->
<x-pulse>
    <!-- Start: Pulse Servers Widget -->
    <livewire:pulse.servers cols="full" />
    <!-- End: Pulse Servers Widget -->

    <!-- Start: Pulse Usage Widget -->
    <livewire:pulse.usage cols="4" rows="2" />
    <!-- End: Pulse Usage Widget -->

    <!-- Start: Pulse Queues Widget -->
    <livewire:pulse.queues cols="4" />
    <!-- End: Pulse Queues Widget -->

    <!-- Start: Pulse Cache Widget -->
    <livewire:pulse.cache cols="4" />
    <!-- End: Pulse Cache Widget -->

    <!-- Start: Pulse Slow Queries Widget -->
    <livewire:pulse.slow-queries cols="8" />
    <!-- End: Pulse Slow Queries Widget -->

    <!-- Start: Pulse Exceptions Widget -->
    <livewire:pulse.exceptions cols="6" />
    <!-- End: Pulse Exceptions Widget -->

    <!-- Start: Pulse Slow Requests Widget -->
    <livewire:pulse.slow-requests cols="6" />
    <!-- End: Pulse Slow Requests Widget -->

    <!-- Start: Pulse Slow Jobs Widget -->
    <livewire:pulse.slow-jobs cols="6" />
    <!-- End: Pulse Slow Jobs Widget -->

    <!-- Start: Pulse Slow Outgoing Requests Widget -->
    <livewire:pulse.slow-outgoing-requests cols="6" />
    <!-- End: Pulse Slow Outgoing Requests Widget -->
</x-pulse>
<!-- End: Pulse Dashboard Layout -->
