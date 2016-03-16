# -*- coding: utf-8 -*-
from django.db.models.signals import post_save,pre_save
from django.dispatch import receiver
from distribution.models import *
import re
import sys

def create_one(mission,host,play_book):
    Progress.objects.create(mission=mission
                            ,host=host,
                            play_book=play_book,
                            status=Status.objects.get(content='undo'))

@receiver(pre_save, sender=Mission)
def check(sender, **kwargs):
    mission=kwargs['instance']
    re_ip = re.compile('\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$')
    if re_ip.match(mission.item):
        result=True
    elif len(Item.objects.filter(content=mission.item))!=0:
        result=True
    else:
        result=False
    if not result:
        sys.exit(2)


@receiver(post_save, sender=Mission)
def create(sender, **kwargs):
    mission=kwargs['instance']
    re_ip = re.compile('\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$')
    if re_ip.match(mission.item):
        for m in mission.play_book:
            create_one(mission,mission.item,m)
    else:
        host_list=Item.objects.get(content=mission.item).host.split('#')
        for host in host_list:
            for m in mission.play_book:
                create_one(mission,host,m)
