from django.db import models
import datetime


# Create your models here.
class CommonModel(models.Model):
    # status
    STATUS_INACTIVE = 0
    STATUS_ACTIVE = 1
    STATUS_CHOICES = (
        (STATUS_ACTIVE, 'Active'),
        (STATUS_INACTIVE, 'Inactive')
    )
    status = models.IntegerField(choices=STATUS_CHOICES,
                                 default=STATUS_INACTIVE,
                                 db_index=True)

    # name
    name = models.CharField(max_length=255)

    # created
    created = models.DateTimeField(auto_now_add=True,
                                   blank=True,
                                   null=True,
                                   default=datetime.date.today())

    # modified
    modified = models.DateTimeField(auto_now=True,
                                    blank=True,
                                    null=True)

    # status == active ?
    def is_active(self):
        if self.status == self.STATUS_ACTIVE:
            return True
        elif self.status == self.STATUS_INACTIVE:
            return False

    is_active.admin_order_field = 'status'
    is_active.boolean = True
    is_active.short_description = 'Is active?'

    def __unicode__(self):
        return self.name

    class Meta:
        abstract = True


class Server(CommonModel):
    hostname = models.CharField(max_length=255)
    username = models.CharField(max_length=255)
    password = models.CharField(max_length=255)
    ssh_key = models.CharField(max_length=255)

    class Meta:
        ordering = ['-status', 'hostname', 'username']
        verbose_name = 'server'
        verbose_name_plural = 'servers'


class Build(CommonModel):
    version = models.CharField(max_length=255)

    class Meta:
        ordering = ['-status', 'name', 'version']
        verbose_name = 'build'
        verbose_name_plural = 'builds'


class Domain(CommonModel):
    # Type
    TYPE_DEVELOP = 0
    TYPE_STAGE = 1
    TYPE_TEST = 2
    TYPE_MASTER = 3
    TYPE_CHOICES = (
        (TYPE_DEVELOP, 'Develop (local)'),
        (TYPE_STAGE, 'Stage'),
        (TYPE_TEST, 'Test'),
        (TYPE_MASTER, 'Master (production)')
    )
    type = models.IntegerField(choices=TYPE_CHOICES, default=TYPE_DEVELOP)

    class Meta:
        ordering = ['-status', 'type', 'name']
        verbose_name = 'domain'
        verbose_name_plural = 'domains'


class Repository(CommonModel):
    url = models.CharField(max_length=255)

    class Meta:
        ordering = ['-status', 'name']
        verbose_name = 'repository'
        verbose_name_plural = 'repositories'


class Workspace(CommonModel):
    path = models.CharField(max_length=255)

    class Meta:
        ordering = ['-status', 'name']
        verbose_name = 'workspace'
        verbose_name_plural = 'workspaces'


class Recipe(CommonModel):
    type = models.ForeignKey('RecipeType')

    class Meta:
        ordering = ['-status', 'type', 'name']
        verbose_name = 'recipe'
        verbose_name_plural = 'recipes'


class RecipeType(CommonModel):

    class Meta:
        ordering = ['-status', 'name']
        verbose_name = 'recipe type'
        verbose_name_plural = 'recipe types'