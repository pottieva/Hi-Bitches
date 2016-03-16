from django.db import models

# Create your models here.

from django.db import models


# Base models that have some common fields.
class BaseModel(models.Model):
    created_date = models.DateTimeField(auto_now_add=True)
    modified_date = models.DateTimeField(auto_now=True)
    class Meta:
        abstract = True

class NameModel(BaseModel):
    content=models.CharField(max_length=100,unique=True)
    alias=models.CharField(max_length=100,unique=True)
    def __unicode__(self):
        return self.alias
    class Meta:
        abstract = True

class CommonModel(models.Model):
    creator = models.CharField(max_length=100)
    created_date = models.DateTimeField(auto_now_add=True)
    modified_date = models.DateTimeField(auto_now=True)
    class Meta:
        abstract = True
