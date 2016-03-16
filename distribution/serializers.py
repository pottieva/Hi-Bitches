from rest_framework import serializers
from distribution.models import Mission,Progress,Play_book,Status,Item


class StatusSerializer(serializers.ModelSerializer):
    class Meta:
        model = Status


class Play_bookSerializer(serializers.ModelSerializer):
    class Meta:
        model = Play_book


class ItemSerializer(serializers.ModelSerializer):
    class Meta:
        model = Item


class MissionSerializer(serializers.HyperlinkedModelSerializer):
    play_book=serializers.SlugRelatedField(queryset=Play_book.objects.all(),many=True,slug_field='alias')
    class Meta:
        model = Mission


class ProgressSerializer(serializers.ModelSerializer):
    play_book = serializers.SlugRelatedField(queryset=Play_book.objects.all(), slug_field='alias')
    mission = serializers.SlugRelatedField(queryset=Mission.objects.all(), slug_field='mark')
    class Meta:
        model = Progress


