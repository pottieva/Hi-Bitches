#coding=utf-8
from django.db import models
import uuid
# from release_action.models import Mission_control
import json
import logging
from abstract.models import  *
logger = logging.getLogger(__name__)

class Item(NameModel):
    host=models.TextField()

class Status(NameModel):
    pass

class Play_book(NameModel):
    Priority=models.IntegerField()

class Mission(models.Model):
    '''mission model'''
    mark=models.UUIDField(primary_key=True, default=uuid.uuid4, editable=False)
    version = models.CharField(max_length=300)
    dep=models.CharField(max_length=300)
    env=models.CharField(max_length=300)
    item=models.CharField(max_length=300)
    play_book=models.ManyToManyField(Play_book)
    status = models.BooleanField(default=0)
    creator = models.CharField(max_length=100)
    def __unicode__(self):
        return str(self.mark)

class Progress(BaseModel):
    '''progress model'''
    mission = models.ForeignKey(Mission)
    host = models.CharField(max_length=100,db_index=True)
    status = models.ForeignKey(Status,related_name='progress_status')
    play_book = models.ForeignKey(Play_book)
    detail=models.TextField(default='no result')

