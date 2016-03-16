from rest_framework import permissions
# Create your views here.
from rest_framework import viewsets
from rest_framework import filters

from serializers import *
from models import *

# Create your views here.

class BaseViewSet(viewsets.ModelViewSet):
    permission_classes = (permissions.DjangoModelPermissions,)
    filter_backends = (filters.DjangoFilterBackend,)

    def perform_create(self, serializer):
        return super(BaseViewSet, self).perform_create(serializer)


class StatusViewSet(BaseViewSet):
    queryset = Status.objects.all()
    serializer_class = StatusSerializer
    filter_fields = ('content',)


class ItemViewSet(BaseViewSet):
    queryset = Item.objects.all()
    serializer_class = ItemSerializer
    filter_fields = ('content',)
    search_fields = ('^item', 'host',)

class Play_bookViewSet(BaseViewSet):
    queryset = Play_book.objects.all()
    serializer_class = Play_bookSerializer
    filter_fields = ('content','Priority')

class MissionViewSet(BaseViewSet):
    queryset = Mission.objects.all()
    serializer_class = MissionSerializer
    filter_backends = (filters.DjangoFilterBackend, filters.SearchFilter)
    filter_fields = ('status', 'item', 'version',)
    search_fields = ('^item', '^creator', '^version')


class ProgressViewSet(BaseViewSet):
    queryset = Progress.objects.all()
    serializer_class = ProgressSerializer
    filter_fields = ('mission', 'status', 'host')
