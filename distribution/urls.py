from django.conf.urls import patterns, url
from distribution import views,signals
from rest_framework import routers

router = routers.DefaultRouter()
router.register(r'play_book', views.Play_bookViewSet)
router.register(r'status', views.StatusViewSet)
router.register(r'item', views.ItemViewSet)
router.register(r'mission', views.MissionViewSet)
router.register(r'progress', views.ProgressViewSet)

urlpatterns = router.urls
